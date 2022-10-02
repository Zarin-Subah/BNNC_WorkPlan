/*chart 1*/
var randomScalingFactor = function () {
    return Math.round(Math.random() * 100);
};
var randomColorFactor = function () {
    return Math.round(Math.random() * 255);
};

var config = {
    type: 'doughnut',
    data: {
        datasets: [{
                data: [
                    30,
                    2,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                ],
            }, {
                data: [
                    33,
                    2,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                ],
            }, {
                data: [
                    31,
                    2,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                ],
            }, {
                data: [
                    19,
                    1,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                ],
            }, {
                data: [
                    17,
                    1,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                ],
            }],
        labels: [
            "% of caregivers of children 0-23 months old receiving age appropriate IYCF counselling",
            "% of children 0-23 months old whose weight was taken at a facility"
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'bottom',
            fullWidth: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        }
    }
};

var ctx = document.getElementById("chart-area2").getContext("2d");
var myDoughnut = new Chart(ctx, config);
/*chart 2*/
