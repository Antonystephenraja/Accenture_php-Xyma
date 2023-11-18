</div>
    </div>
    <script>
    document.getElementById("dashboardLink").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("page-content-wrapper").textContent = "Dashboard content goes here";
    });
</script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")
    var toggleButtonmax =document.getElementById("menu-min-toggle")
    toggleButton.onclick = function () {
        el.classList.toggle("toggled")
    }
    function updateValue() {
        const url = "http://localhost/iocl/Database/data.php"; // Replace with your own URL
        fetch(url).then(response => response.json()).then(data => {
        //console.log(data)
        // Get the value from the JSON data
        const value = data[0].temperature;
        const value1 = data[0].density;
        const value2 = data[0].viscosity;
        const level1 = data[0].wear_debris;
        // Update the value inside the h3 tag
        document.getElementById("s1").innerHTML = value + " °C";
        document.getElementById("s2").innerHTML = value1 + " ";
        document.getElementById("s3").innerHTML = value2 + " ";
        document.getElementById("s4").innerHTML = level1 + " ";
     
        }).catch(error => console.error(error));
        
    }
    setInterval(updateValue, 500);
    const ctx = document.getElementById('myChart');
    const url = "http://localhost/iocl/Database/alldata.php";
    async function getchartdata(){
        const sensor1val =[];
        const time = [];
        const response = await fetch(url);
        const data = await response.json();
        //console.log(data);

        for (let index = 0; index < data.length; index++) {
            sensor1val[index] = data[index].temperature;
            time[index]=data[index].timestamp;
        }
        console.log(time);
        if (mychart) {
            mychart.data.labels = time;
                mychart.data.datasets[0].data = sensor1val;
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
                        borderWidth: 1 ,
                        borderColor: '#BF2098'
                    },
           
            ]
                },
                options: { }
            });
        }
    }
    let mychart;
     setInterval(getchartdata,1000);
</script> 


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>