<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="wrapper">
        <?php include "include/sidebar.php"; ?>
        <div class="main">
            <?php include "include/navbar.php"; ?>



            <section class="Agents px-4">

                <h3 class="p-2">
                    Candidature(<?=count($candidatures)?>)
                </h3>
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead class="bg-light">
                    <tr>
                        <th>UserName</th>
                        <th>Offer Title</th>
                        <th>Date de soumission</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($candidatures as $candidature){

                        ?>
                        <tr class="freelancer">
                            <td>
                                <div class="ms-3">
                                    <p class="fw-bold mb-1 f_name"> <?=$candidature['NomUtilisateur']?> </p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"> <?=$candidature['TitreOffre']?> </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?=$candidature['DateSoumission']?></p>

                            </td>
                            <td>
                                <a href="#" class="f_status"><?=$candidature['status']?></a>
                            </td>
                            <td class="f_position"></td>
                            <td class="">
                                <a href="?route=updateCandidature&status=accept&candidature=<?=$candidature['CandidatureID']?>"><img class="accept_task w-50" src="assets/img/journal-check.svg" alt="icon" ></a>
                                <a href="?route=updateCandidature&status=reject&candidature=<?=$candidature['CandidatureID']?>"><img class="delet_user w-50" src="assets/img/journal-x.svg" alt="icon"></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </section>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>
</html>