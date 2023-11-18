
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />

    <title>Dashboard</title>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center mt-2" style="width: 15rem">
                <div class="container">
                    <div class="row">
                        <div class="col-md-13">
                            <img src="./assets/ACN_BIG.png" alt="logo" class="img-fluid img-responsive" style="width: 300px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group list-group-flush my-3 py-4 pl-4">
                <a href="dashbord.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="reports.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-search-plus me-2"></i>Reports</a>
                <a href="graph.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Graph</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-cog fa-spin me-2"></i>Settings</a>
            </div>
            <div>  
                <div class="pl-5" style="width: 13rem">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <img src="./assets/xyma.png" alt="logo" class="img-fluid img-responsive">
                            </div>
                            <h5 class="small pl-5 text-center mt-3"align-items-center>©️ All rights Reserved</h5>
                            <div class="col-md-10 ">
                                <img src="./assets/iit.jpg" alt="logo" class="img-fluid img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>