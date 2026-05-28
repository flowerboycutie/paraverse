<?php
// TEMPLATE: Configure your stat cards here
$statCards = [
    [
        'label'      => 'Total Login Events',
        'value'      => '809,274',
        'valueColor' => 'text-primary',
        'cardBg'     => 'bg-light-primary',
    ],
    [
        'label'      => 'Unique Users (by email)',
        'value'      => '26,865',
        'valueColor' => 'text-gray-800',
        'cardBg'     => '',
    ],
    [
        'label'      => 'Logins (Last 7 Days)',
        'value'      => '12,854',
        'valueColor' => 'text-gray-800',
        'cardBg'     => '',
    ],
    [
        'label'      => 'Logins (Last 30 Days)',
        'value'      => '51,715',
        'valueColor' => 'text-gray-800',
        'cardBg'     => '',
    ],
];
?>

<?php foreach ($statCards as $card): ?>
    <!-- begin::Col -->
    <div class="col">
        <!--begin::Statistics Widget-->
        <div class="card <?= htmlspecialchars($card['cardBg']) ?> card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column justify-content-center align-items-start">
                <span class="card-title text-gray-600 fw-bold fs-6 mb-3 d-block"><?= htmlspecialchars($card['label']) ?></span>
                <span class="<?= htmlspecialchars($card['valueColor']) ?> display-6 fw-bold"><?= htmlspecialchars($card['value']) ?></span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget-->
    </div>
    <!-- end::Col -->
<?php endforeach; ?>