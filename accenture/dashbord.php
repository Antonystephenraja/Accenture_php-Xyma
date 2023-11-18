<!-- Start:Header 
==============================-->
<?php 
    include_once './layouts/header.php'
?>
<!-- End: header 
==============================-->
<!-- Start:Body Content 
==============================-->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Dashboard</h2>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a><i class="fas fa-user me-2"></i>Welcome Stephen</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-4" id="reading"> 
        <div class="row g-3 my-2">
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded1"style="height: 90%;">
                    <i class="fas fa-thin fa-temperature-high fa-5x primary-text p-3"></i>
                    <div>
                        <h3 class="fs-30 " id="s1"></h3>
                        <p class="fs-6">Sensor-1</p>
                        <h3 class="fs-10" id="s4"></h3>
                        <p class="fs-6">RTD-1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded1"style="height: 90%;">
                    <i class="fas fa-light fa-temperature-high fa-5x primary-text p-3"></i>
                    <div>
                        <h3 class="fs-30" id="s2"></h3>
                        <p class="fs-6">Sensor-2</p>
                        <h3 class="fs-10" id="s5"></h3>
                        <p class="fs-6">RTD-2</p>
                    </div>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded1 " style="height: 90%;">
                    <i class="fas fa-light fa-temperature-high fa-5x primary-text p-3"></i>
                    <div>
                        <h3 class="fs-30" id="s3"></h3>
                        <p class="fs-6">Sensor-3</p>
                        <h5 class="fs-10" id="s6"></h5>
                        <p class="fs-6">RTD-3</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- image card -->
        <div class="row g-3 my-2">      
            <div class="col-md-12">
                <div class="card  rounded1">
                    <div class="card-body ">
                    <div>
                    <canvas id="myChart" style="width:100%;max-width:1700px;max-height:300px"></canvas>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- End: Body Content
==============================-->
<!-- Start:Footer 
==============================-->
<?php 
    include_once './layouts/footer.php'
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- End: Footer 
==============================-->   
<script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")
    var toggleButtonmax =document.getElementById("menu-min-toggle")
    toggleButton.onclick = function () {
        el.classList.toggle("toggled")
    }
    function updateValue() {
        const url = "http://localhost/accenture/sensorfix1.php"; // Replace with your own URL
        fetch(url).then(response => response.json()).then(data => {
        //console.log(data)
        // Get the value from the JSON data
        const value = data[0].sensor1;
        const value1 = data[0].sensor2;
        const value2 = data[0].sensor3;
        const level1 = data[0].rtd1;
        const level2 = data[0].rtd2;
        const level3 = data[0].rtd3;
        // Update the value inside the h3 tag
        document.getElementById("s1").innerHTML = value + " °C";
        document.getElementById("s2").innerHTML = value1 + " °C";
        document.getElementById("s3").innerHTML = value2 + " °C";
        document.getElementById("s4").innerHTML = level1 + " °C";
        document.getElementById("s5").innerHTML = level2 + " °C";
        document.getElementById("s6").innerHTML = level3 + " °C";
        }).catch(error => console.error(error));
        
    }
    setInterval(updateValue, 500);
    const ctx = document.getElementById('myChart');
    const url = "http://localhost/accenture/sensorfix.php";
    async function getchartdata(){
        const sensor1val =[];
        const sensor2val =[];
        const sensor3val =[];
        const time = [];
        const response = await fetch(url);
        const data = await response.json();
        //console.log(data);

        for (let index = 0; index < data.length; index++) {
            sensor1val[index] = data[index].sensor1;
            sensor2val[index] = data[index].sensor2;
            sensor3val[index] = data[index].sensor3;
            time[index]=data[index].timestamp;
        }
        //console.log(sensor2val);
        //console.log(sensor1val);
        //console.log(sensor3val);
        console.log(time);
        if (mychart) {
            mychart.data.labels = time;
                mychart.data.datasets[0].data = sensor1val;
                mychart.data.datasets[1].data = sensor2val;
                mychart.data.datasets[2].data = sensor3val;
                mychart.update(); 
        }else{
                mychart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: time,
                    datasets: [
                        {

                        label: 'sensor1',
                        data: sensor1val,
                        borderWidth: 1 
                    },
                {
                    label: 'sensor2',
                    data: sensor2val,
                    borderWidth: 1
                },{
                    label: 'sensor3',
                    data: sensor3val,
                    borderWidth: 1
                }
            ]
                },
                options: { }
            });
        }
    }
    let mychart;
     setInterval(getchartdata,1000);
</script> 
