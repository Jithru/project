// let label1=['Nimal','Sirimal','Kamal','Sunil','Jagath','Sandun','Kasun'];
let label1=['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday']
let participation=[2,5,7,1,10,5,3];
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
        // legend: {display: false},
        title:{
            text:"This is Test",
            display: true
        },
        responsive:true
    }
    
});