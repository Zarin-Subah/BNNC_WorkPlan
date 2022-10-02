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
                    13,
                    40,
                    1,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                ],
            }, {
                data: [
                    15,
                    33,
                    2,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                ],
            }, {
                data: [
                    15,
                    44,
                    3,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                ],
            }, {
                data: [
                    11,
                    38,
                    4,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                ],
            }, {
                data: [
                    10,
                    39,
                    4,
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                ],
            }],
        labels: [
            "% of women receiving maternal nutrition counselling",
            "% of visits with pregnant women who received any IFA",
            "% of times women attended a facility during pregnancy that they were weighed"
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

var ctx = document.getElementById("chart-area").getContext("2d");
var myDoughnut = new Chart(ctx, config);