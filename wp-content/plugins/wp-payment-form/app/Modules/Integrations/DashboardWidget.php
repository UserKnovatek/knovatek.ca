<?php

namespace WPPayForm\App\Modules\Integrations;

use WPPayForm\App\Models\Form;
use WPPayForm\App\Models\Submission;
use WPPayForm\App\Models\Subscription;
use WPPayForm\App\Services\AccessControl;
use WPPayForm\Framework\Foundation\App;

class DashboardWidget
{
    public function register()
    {
        add_action('wp_dashboard_setup', array($this, 'addWidget'));
    }

    /**
     *
     */
    public function addWidget()
    {
        if (!AccessControl::hasEndPointPermission('get_sumissions', 'submissions')) {
            return false;
        }
        wp_add_dashboard_widget('payform_stat_widget', __('WPPayForm Latest Submissions', 'wppayform'), array($this, 'showStat'), 10, 1);
    }

    public function showStat()
    {
        $stats = Submission::select([
            'wpf_submissions.id',
            'wpf_submissions.form_id',
            'wpf_submissions.customer_name',
            'wpf_submissions.payment_total',
            'wpf_submissions.payment_status',
            'posts.post_title',

            'wpf_subscriptions.recurring_amount',
            'wpf_subscriptions.initial_amount',
            'wpf_subscriptions.quantity',
            'wpf_subscriptions.status'

        ])
            ->orderBy('wpf_submissions.id', 'DESC')
            ->join('posts', 'posts.ID', '=', 'wpf_submissions.form_id')
            ->leftJoin('wpf_subscriptions', function ($table) {
                $table->on('wpf_subscriptions.submission_id', '=', 'wpf_submissions.id');
            })
            ->limit(10)
            ->get();

        $allCurrencySettings = [];
        foreach ($stats as $stat) {
            if (!isset($allCurrencySettings[$stat->form_id])) {
                $currencySettings = Form::getCurrencyAndLocale($stat->form_id);
                $allCurrencySettings[$stat->form_id] = $currencySettings;
            } else {
                $currencySettings = $allCurrencySettings[$stat->form_id];
            }
            if ($stat->recurring_amount) {
                $subsTotal = ($stat->recurring_amount * $stat->quantity);
                $stat->formattedTotal = wpPayFormFormattedMoney($subsTotal, $currencySettings);
            } else {
                $stat->formattedTotal = wpPayFormFormattedMoney($stat->payment_total, $currencySettings);
            }
        }

        $DB = App::make('db');
        $paidStats = Submission::select(
            'currency',
            'form_id',
            $DB->raw("SUM(payment_total) as total_paid")
        )
            ->whereIn('payment_status', ['paid'])
            ->groupBy('currency')
            ->get();

        $subsTotal = Subscription::select(
            $DB->raw('SUM(payment_total - initial_amount) as recurring_total')
        )
            ->whereIn('status', ['active'])
            ->get();

        foreach ($paidStats as $paidStat) {
            if (!isset($allCurrencySettings[$paidStat->form_id])) {
                $currencySettings = Form::getCurrencyAndLocale($paidStat->form_id);
                $allCurrencySettings[$paidStat->form_id] = $currencySettings;
            } else {
                $currencySettings = $allCurrencySettings[$paidStat->form_id];
            }
            $totalPaid = intval($paidStat->total_paid) + intval($subsTotal[0]->recurring_total);
            $paidStat->formattedTotal = wpPayFormFormattedMoney($totalPaid, $currencySettings);
        }

        if (!$stats) {
            echo 'You can see your submission here';
            return;
        }

        $this->printStats($stats, $paidStats);
        return;
    }

    private function printStats($stats, $paidStats)
    {
        ?>
        <ul class="wpf_dashboard_stats">
            <?php foreach ($stats as $stat) : ?>
                <li>
                    <a title="Form: <?php echo $stat->post_title; ?>"
                       href="<?php echo admin_url('admin.php?page=wppayform.php#/edit-form/' . $stat->form_id . '/entries/' . $stat->id . '/view'); ?>">
                        #<?php echo $stat->id; ?> - <?php echo $stat->customer_name; ?>
                        <?php if ($stat->recurring_amount) { ?>
                            <span class="wpf_status wpf_status_<?php echo $stat->status; ?>">
                                    <?php echo 'subscription' . ' ' . $stat->status; ?>
                                </span>
                        <?php } else { ?>
                            <span class="wpf_status wpf_status_<?php echo $stat->payment_status; ?>">
                                    <?php echo 'payment' . ' ' . $stat->payment_status; ?>
                                </span>
                        <?php } ?>
                        <span class="wpf_total"><?php echo $stat->formattedTotal; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="wpf_payment_summary">
            <b><?php _e('Total Paid & Active Payment Received', 'wppayform'); ?></b>
            <?php foreach ($paidStats as $index => $stat) : ?>
                <b>(<?php echo $stat->currency; ?>
                    )</b>: <?php echo $stat->formattedTotal; ?><?php if (count($paidStats) - 1 != $index): ?>
                    <br/><?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if (!defined('WPPAYFORM_PRO_INSTALLED')) : ?>
        <div class="wpf_recommended_plugin">
            Upgrade to Pro and get awesome features and increase your conversion rates
            <a style="display: block; width: 100%; margin-top: 10px; text-align: center;"
               target="_blank"
               rel="noopener"
               href="https://wpmanageninja.com/downloads/wppayform-pro-wordpress-payments-form-builder/?utm_source=plugin&utm_medium=dashboard&utm_campaign=upgrade"
               class="button button-primary">
                Upgrade To Pro
            </a>
        </div>
    <?php elseif (!defined('NINJA_TABLES_DIR_URL')) : ?>
        <div class="wpf_recommended_plugin">
            Recommended Plugin: <b>Ninja Tables</b> - Best Table Plugin for WP -
            <a href="<?php echo $this->getInstallUrl('ninja-tables'); ?>">Install</a>
            | <a target="_blank" rel="noopener" href="https://wordpress.org/plugins/ninja-tables/">Learn More</a>
        </div>
    <?php elseif (!defined('ENHANCED_BLOCKS_VERSION')) : ?>
        <div class="wpf_recommended_plugin">
            Recommended Plugin: <b>Enhanced Blocks ??? Page Builder Blocks for Gutenberg</b> <br/>
            <a href="<?php echo $this->getInstallUrl('enhanced-blocks'); ?>">Install</a>
            | <a target="_blank" rel="noopener" href="https://wordpress.org/plugins/enhanced-blocks/">Learn More</a>
        </div>
    <?php endif; ?>
        <style>
            .wpf_payment_summary {
                display: block;
                padding-top: 10px;
                border-bottom: 1px solid #eeeeee;
                padding-bottom: 10px;
            }

            ul.wpf_dashboard_stats span.wpf_status {
                border: 1px solid gray;
                border-radius: 3px;
                padding: 0px 7px 2px;
                text-transform: capitalize;
                font-size: 11px;
            }

            ul.wpf_dashboard_stats span.wpf_status_paid {
                background: #f0f9eb;
            }

            ul.wpf_dashboard_stats span.wpf_status_active {
                background: #f0f9eb;
            }

            ul.wpf_dashboard_stats span.wpf_status_pending {
                background: #fffaf2;
            }

            ul.wpf_dashboard_stats span.wpf_status_failed {
                background: #fdd;
            }

            ul.wpf_dashboard_stats {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            ul.wpf_dashboard_stats li {
                padding: 8px 12px;
                border-bottom: 1px solid #eeeeee;
                margin: 0 -12px;
                cursor: pointer;
            }

            ul.wpf_dashboard_stats li:hover {
                background: #fafafa;
                border-bottom: 1px solid #eeeeee;
            }

            ul.wpf_dashboard_stats li:hover a {
                color: black;
            }

            ul.wpf_dashboard_stats li:nth-child(2n+2) {
                background: #f9f9f9;
            }

            ul.wpf_dashboard_stats li span.wpf_total {
                float: right;
            }

            ul.wpf_dashboard_stats li a {
                display: block;
                color: #0073aa;
                font-weight: 500;
                font-size: 105%;
            }

            .wpf_recommended_plugin {
                padding: 15px 0px 0px;
            }

            .wpf_recommended_plugin a {
                font-weight: bold;
                font-size: 110%;
            }
        </style>
        <?php
    }

    private function getInstallUrl($plugin)
    {
        return wp_nonce_url(
            self_admin_url('update.php?action=install-plugin&plugin=' . $plugin),
            'install-plugin_' . $plugin
        );
    }
}
