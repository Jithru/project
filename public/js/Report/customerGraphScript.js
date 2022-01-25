let label1=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
let participation=[2,5,7,10,4,0,3];
let colors1=['#0892d0'];

let mychart=document.getElementById("incomeChart").getContext('2d');
let chart1= new Chart(mychart, {
    type: 'bar',
    data:{
        labels: label1,
        datasets: [{
            data: participation,
            backgroundColor: colors1,
        }]
    },
    options:{
        title:{
            text:"hi,this is test",
            display: true
        },
        responsive:true
    }
    
});