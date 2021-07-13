const date = new Date();

const renderCalendar = () => {

    const month_days = document.querySelector(".block-days");
    const lastday = new Date(date.getFullYear(), date.getMonth() + 1,0).getDate();
    date.setDate(1);

    const month = [
        "Январь",
        "Февраль",
        "Март",
        "Апрель",
        "Май",
        "Июнь",
        "Июль",
        "Август",
        "Сентябрь",
        "Октябрь",
        "Ноябрь",
        "Декабрь",
    ];
    const prevLastDay = new Date(date.getFullYear(), date.getMonth(),0).getDate();

    const firstday = date.getDay();
    const lastDay_1 = new Date(date.getFullYear(), date.getMonth() + 1,0).getDay();

    const nextDays = 7 - lastDay_1;

    document.querySelector('.block-date h1').innerHTML = month[date.getMonth()];

    document.querySelector('.block-date p').innerHTML = new Date().toDateString();

    let days = "";

    for(let x = firstday - 1; x > 0; x--){
        days += `<div class="prev-days">${prevLastDay - x + 1}</div>`;
    }

    for(let i = 1; i<=lastday; i++){
        if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<div class="today_1">${i}</div>`;
        } else{
            days += `<div>${i}</div>`;
        }
    }

    for( let h = 1; h<= nextDays; h++){
        days += `<div class="next-date">${h}</div>`;
        month_days.innerHTML = days;
    }

}

document.querySelector('.prev').addEventListener('click', () =>{
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});

document.querySelector('.next').addEventListener('click', () =>{
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});

renderCalendar();
