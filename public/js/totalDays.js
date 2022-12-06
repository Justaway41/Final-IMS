const totalDin = () => {
    event.preventDefault();
    const dayNames = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
    ];
    let startDate = $("input.start-date").val();
    let endDate = $("input.end-date").val();
    let total_Days = $("input#totalDays");
    const start = new Date(startDate);
    const end = new Date(endDate);

    const dates = [];
    const Differnce_In_Time = end.getTime() - start.getTime();

    const Difference_In_Days = Differnce_In_Time / (1000 * 3600 * 24);

    let Total_Diff = Difference_In_Days + 1;
    function getDatesInRange(startDate, endDate) {
        const date = new Date(startDate.getTime());

        date.setDate(date.getDate());

        while (date <= endDate) {
            dates.push(new Date(date).getDay());
            date.setDate(date.getDate() + 1);
        }

        dates.forEach((date) => {
            if (dayNames[date] === "Saturday" || dayNames[date] === "Sunday") {
                Total_Diff = Total_Diff - 1;
                // console.log(Total_Diff);
            }
        });
    }

    getDatesInRange(start, end);

    total_Days.val(Total_Diff);
};
