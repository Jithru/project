let label1=['Monday','Tuesday','WednesDay','Thursday','Friday','Saturday','Sunday'];
let data1=[5000.00,8000.00,4000.00,10000.00,10000.00,3000.00,6500.00];
let colors1=['#0892d0','#0892d0'];

let mychart=document.getElementById("incomeChart").getContext('2d');
let chart1= new Chart(mychart, {
    type: 'bar',
    data:{
        labels: label1,
        datasets: [{
            label:"Incomes",
            data: data1,
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