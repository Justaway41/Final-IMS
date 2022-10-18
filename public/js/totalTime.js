function timeCalculator() {
    event.preventDefault();
    function split(time) {
        let t = time.split(":");
        return parseInt(t[0] * 60, 10) + parseInt(t[1], 10);
    }

    let start = $("input#startTime");
    let end = $("input#endTime");
    let total_hours = $("input#totalTime");
    totalHours = 0;
    for (let i = 0; i < start.length; i++) {
        let starttime = split($(start[i]).val());
        let endtime = split($(end[i]).val());
        if (starttime < endtime) {
            totalHours_new = Math.floor(((endtime - starttime) / 60) * 2) / 2;
        } else if (starttime > endtime) {
            totalHours_new =
                Math.floor(((endtime + 2460 - starttime) / 60) * 2) / 2;
        } else {
            totalHours_new = 0;
        }
        totalHours += totalHours_new;
        total_hours.val(totalHours);
    }
}
