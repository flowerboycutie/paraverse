<?php
// TEMPLATE: Configure your table here
$tableConfig = [
    'title'   => 'Top 10 Active Associates',
    'columns' => ['#', 'User', 'Logins', 'Last Login'],
    'rows'    => [
        [1, ['Micah Villaruz',        'mmvillaruz@feutech.edu.ph'], 4080, '2023-11-15 14:30'],
        [2, ['Manuel Garcia',         'mbgarcia@feutech.edu.ph'],   4000, '2023-11-15 14:30'],
        [3, ['Jan Edilbert Solomon',  'jnsolomon@feutech.edu.ph'],  3589, '2023-11-15 14:30'],
        [4, ['Paula Trisha Balcera',  'pdbalcera@feutech.edu.ph'],  3279, '2023-11-15 14:30'],
        [5, ['Charlene Marie Arabejo', 'caarabejo@feutech.edu.ph'],  2996, '2023-11-15 14:30'],
        [6, ['Owen Ualat',            'onualat@feutech.edu.ph'],    2678, '2023-11-15 14:30'],
        [7, ['Rochelle Borje',        'rgborje@feutech.edu.ph'],    2367, '2023-11-15 14:30'],
        [8, ['Raymond Dino Deraya',   'rmderaya@feutech.edu.ph'],   2109, '2023-11-15 14:30'],
        [9, ['Moira Ashley Roy',      'mcroy@feutech.edu.ph'],      1789, '2023-11-15 14:30'],
        [10, ['Mark Joseph Salinas',   'mmsalinas@feutech.edu.ph'],  1754, '2023-11-15 14:30'],
    ],
];
?>

<!--begin::List Widget-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0">
        <h3 class="card-title fw-bold text-gray-900"><?= htmlspecialchars($tableConfig['title']) ?></h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-2">
        <table class="table">
            <!--begin::Table head-->
            <thead>
                <tr>
                    <?php foreach ($tableConfig['columns'] as $col): ?>
                        <th scope="col" class="text-muted"><?= htmlspecialchars($col) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
                <?php foreach ($tableConfig['rows'] as $row): ?>
                    <tr class="align-middle">
                        <th scope="row"><?= $row[0] ?></th>
                        <td>
                            <?php if (is_array($row[1])): ?>
                                <span class="text-gray-900 fw-bold text-hover-primary fs-6"><?= htmlspecialchars($row[1][0]) ?></span>
                                <span class="text-muted d-block fw-bold"><?= htmlspecialchars($row[1][1]) ?></span>
                            <?php else: ?>
                                <span class="text-gray-900 fw-bold text-hover-primary fs-6"><?= htmlspecialchars($row[1]) ?></span>
                            <?php endif; ?>
                        </td>
                        <?php for ($i = 2; $i < count($row); $i++): ?>
                            <td class="fw-bold"><?= htmlspecialchars($row[$i]) ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!--end::Table body-->
        </table>
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget-->