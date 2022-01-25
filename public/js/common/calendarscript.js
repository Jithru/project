const date=new Date();

const renderCalendar=()=>{
    date.setDate(1);
//select class "days" from html
    const monthDays=document.querySelector(".days");

    //This shows the last day of the current month.
    const lastDay=new Date(date.getFullYear(),date.getMonth()+1,0).getDate();
    //This shows the last day of the previous month.
    const prevDay=new Date(date.getFullYear(),date.getMonth(),0).getDate();

    

    //Get the index of the week of the start of the month
    const firstDayIndex=date.getDay();
    console.log(firstDayIndex);
    //Get the index of the week of the end of the month
    const lastDayIndex= new Date(date.getFullYear(),date.getMonth()+1,0).getDay();
    console.log(lastDayIndex);
    const nextDays=7-(lastDayIndex+1);
    const months= [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.querySelector(".date h2").innerHTML=months[date.getMonth()];

    document.querySelector(".date p").innerHTML=new Date().toDateString();
    

    let days="";
    //days from previous month
    for(let x=firstDayIndex;x>0;x--){
        days+=`<div class="prev-date">${prevDay-x+1}</div>`;
    }
    //days from this month
    for(let i=1;i<=lastDay;i++){
        if(i==new Date().getDate() && date.getMonth()==new Date().getMonth()){
            days+=`<div class="today" id="${date.getFullYear()}-${date.getMonth()}-${i}"><button class= "dayButton" id="${i}" value="${i}" name="${i}" onclick=getFullDate(${i},${date.getMonth()},${date.getFullYear()})>${i}</button></div>`;
        }else{
            days+=`<div id="${date.getFullYear()}-${date.getMonth()}-${i}"><button class= "dayButton" id="${i}" value="${i}" name="${i}" onclick=getFullDate(${i},${date.getMonth()},${date.getFullYear()})>${i}</button></div>`;
        }
    }
    //days from next month
    for(let x=1;x<=nextDays;x++){
        days+=`<div class="next-date">${x}</div>`;
    }
    monthDays.innerHTML=days;
};


//navigation buttons
document.querySelector('.prev').addEventListener('click',()=>{
    date.setMonth(date.getMonth()-1);
    renderCalendar();
});
document.querySelector('.next').addEventListener('click',()=>{
    date.setMonth(date.getMonth()+1);
    renderCalendar();
});
renderCalendar();


