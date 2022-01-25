// let label1=['Nimal','Sirimal','Kamal','Sunil','Jagath','Sandun','Kasun'];
// let label1=['Jannuary', 'February', 'March', 'April', 'May', 'June','July','August','Septhember','October','November','December']
// let writtenParticipation=[30,25,17,15,30,25,33,28,35,18,22,25];
// let trailParticipation=[20,35,27,18,33,25,38,28,35,28,26,40];
// let colors1=['#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0'];
// // let colors2=['#262b2f'];

// let mychart=document.getElementById("incomeChart").getContext('2d');
// let chart1= new Chart(mychart, {
//     type: 'bar',
//     data:{
//         labels: label1,
//         datasets: [{
//             data: writtenParticipation,
//             backgroundColor: colors1,
//         }],

//         datasets: [{
//             data: trailParticipation,
//             backgroundColor: colors1,
//         }]

//     },

//     options:{
//         legend: {display: false},
//         title:{
//             text:"This is Test",
//             display: true
//         },
//         responsive:true
//     }

    
// });

var trace1 = {

    x: ['Jannuary', 'February', 'March', 'April', 'May', 'June','July','August','Septhember','October','November','December'],
    y: [30,25,17,15,30,25,33,28,35,18,22,25],
    marker:{
        color: ['#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0','#0892d0']
      },
    name: 'Participate count',
    type: 'bar'
  };
  
  var trace2 = {
    x: ['Jannuary', 'February', 'March', 'April', 'May', 'June','July','August','Septhember','October','November','December'],
    y:[23,20,15,10,30,21,30,21,33,15,19,21],
    marker:{
        color: ['#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f','#262b2f']
      },
    name: 'Pass count',
    type: 'bar'
  };
  
  var data = [trace1, trace2];
  
  var layout = {
    title: {
        text:'Written Exam',
        font: {
          family: '"Roboto", sans-serif',
          size: 24
        },
        xref: 'paper',
        x: 5,
      },  
    barmode: 'group'
};
  
  Plotly.newPlot('incomeChart', data, layout);