
var sessionDates=[]
// function getDatesOfSessionsAndSessions(){
    httpreq=new XMLHttpRequest()
    httpreq.onreadystatechange=function(){
        if(httpreq.readyState===4 && httpreq.status===200){
            // console.log(httpreq.responseText)
            const obj=JSON.parse(httpreq.responseText)
            // console.table(obj)
            console.log(obj)
            for(var i=0;i<obj.length;i++){
                let str=String(obj[i].date)
                
                sessionDates[i]=str.split("-")
                
            }
            for(var i=0;i<sessionDates.length;i++){
                if(sessionDates[i][1].charAt(0)=="0"){
                    sessionDates[i][1]=sessionDates[i][1].charAt(1)
                }
                if(sessionDates[i][2].charAt(0)=="0"){
                    sessionDates[i][2]=sessionDates[i][2].charAt(1)
                }
            }
            var sessionDateArr=[]
            for(var i=0;i<sessionDates.length;i++){
                sessionDateArr[i]=sessionDates[i][0].concat("-",(sessionDates[i][1]-1),"-",sessionDates[i][2])
            }
            console.log(sessionDateArr)
            // let yearsArr=[]
            // let monthsArr=[]
            // let datesArr=[]
            // for(var i=0;i<sessionDates.length;i++){
            //     yearsArr.push(parseInt(sessionDates[i][0]))
            //     monthsArr.push(parseInt(sessionDates[i][[1]])-1)
            //     datesArr.push(parseInt(sessionDates[i][2]))
            // }


            // console.log(typeof sessionDates[1][1])
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
                    var yearStr=String(date.getFullYear())
                    var loopingDate=yearStr.concat("-",date.getMonth(),"-",i)
                    console.log(loopingDate)
                    if(i==new Date().getDate() && date.getMonth()==new Date().getMonth()){
                        days+=`<div class="today" id="${date.getFullYear()}-${date.getMonth()}-${i}"><button class= "dayButton" id="${i}" value="${i}" name="${i}" onclick=getFullDate(${i},${date.getMonth()},${date.getFullYear()})>${i}</button></div>`;
                      }else if(sessionDateArr.includes(loopingDate)){
                        days+=`<div class="today" id="${date.getFullYear()}-${date.getMonth()}-${i}"><button class= "dayButton" id="${i}" value="${i}" name="${i}" onclick=getFullDate(${i},${date.getMonth()},${date.getFullYear()})>${i}</button></div>`;
                        // console.log(i,date.getMonth(),date.getFullYear())
                    }
                    else{
                        days+=`<div id="${date.getFullYear()}-${date.getMonth()}-${i}"><button class= "dayButton" id="${i}" value="${i}" name="${i}" onclick=getFullDate(${i},${date.getMonth()},${date.getFullYear()})>${i}</button></div>`;
                    }
                }
                //days from next month
                for(let x=1;x<=nextDays;x++){
                    days+=`<div class="next-date">${x}</div>`;
                }
                monthDays.innerHTML=days;
            };
            // console.log(datesArr,monthsArr,yearsArr)
            // console.log(typeof toString(new Date().getDate()))
            
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
        }
    }
    let url="http://localhost/project/Student/getDatesOfSessionsAndSessions"
    httpreq.open("POST",url,true)
    httpreq.send()
// }
// console.log(sessionDates)
// getDatesOfSessionsAndSessions()
// function getDatesOfSessions(){
//     fetch("http://localhost/project/Manager/getDatesOfSessionsAndSessions", {
//         method: 'POST'
//     }).then(async(response) => {
//         // console.log("data", response.json());
//         const d = await response.json();
//         if(d)console.table(d)
        

//     }).catch(err => {
//         console.log(err)
//     })
// }

// getDatesOfSessions();




