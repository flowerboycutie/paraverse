<?php
// TEMPLATE: Configure your stat card here
$statCardConfig = [
    'primary' => [
        'label'    => 'XP Awarded',
        'value'    => '13,896,070',
        'sublabel' => 'Total XP across all active awards',
    ],
    'badges' => [
        ['label' => '114,602 active awards', 'style' => 'border p-1 rounded border-gray-200 bg-gray-200 text-gray-600 fw-bold'],
        ['label' => '12,036 earners',         'style' => 'text-gray-600 fw-bold'],
    ],
    'stats' => [
        ['label' => 'AVG XP/AWARD',  'value' => '121'],
        ['label' => 'AVG XP/EARNER', 'value' => '1,515'],
    ],
];
?>

<!--begin::Feeds Widget-->
<div class="card mb-5 mb-xxl-8">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Top Row-->
        <div class="row">
            <div class="col d-flex flex-column gap-1">
                <span class="text-gray-600 fw-bold"><?= htmlspecialchars($statCardConfig['primary']['label']) ?></span>
                <span class="display-6"><?= htmlspecialchars($statCardConfig['primary']['value']) ?></span>
                <span class="text-gray-600 fw-bold"><?= htmlspecialchars($statCardConfig['primary']['sublabel']) ?></span>
            </div>
            <div class="col d-flex flex-column align-items-end gap-1">
                <?php foreach ($statCardConfig['badges'] as $badge): ?>
                    <span class="<?= htmlspecialchars($badge['style']) ?>"><?= htmlspecialchars($badge['label']) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <!--end::Top Row-->
        <div class="separator my-4"></div>
        <!--begin::Bottom Row-->
        <div class="row">
            <?php foreach ($statCardConfig['stats'] as $stat): ?>
                <div class="col d-flex flex-column">
                    <span class="text-gray-600 fw-bold"><?= htmlspecialchars($stat['label']) ?></span>
                    <span class="display-6"><?= htmlspecialchars($stat['value']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <!--end::Bottom Row-->
    </div>
    <!--end::Body-->
</div>
<!--end::Feeds Widget-->