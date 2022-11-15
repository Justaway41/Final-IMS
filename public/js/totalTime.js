$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});
function addTiming() {
    $("#time-row").append(
        '   <div><a href="#" class="crossButton" onclick="removeTiming(this)">&#x2716</a><br>\n' +
            '       <div class="timelog">\n' +
            '           <div class= "mb-3 time" >\n' +
            '               <label for= "exampleInputEmail1" > Start Time</label >\n' +
            '               <input type="time" class="form-control startTime" aria-describedby="emailHelp" name="start_time[]">\n' +
            "           </div>\n" +
            '           <div class="mb-3 time">\n' +
            '               <label for="exampleInputEmail1">End Time</label>\n' +
            '               <input type="time" class="form-control endTime" aria-describedby="emailHelp" name="end_time[]">\n' +
            "           </div>\n" +
            "       </div >\n" +
            "   </div>"
    );
}

function removeTiming(ref) {
    $(ref).parent().remove();
}

function timeCalculator() {
    event.preventDefault();
    function split(time) {
        let t = time.split(":");
        return parseInt(t[0] * 60, 10) + parseInt(t[1], 10);
    }

    let start = $("input.startTime");
    let end = $("input.endTime");
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

const daysCalculator = () => {
    event.preventDefault();
    let startDate = $("input.start-date").val();
    let endDate = $("input.end-date").val();
    let total_days = $("input#totalDays");
    let start = new Date(startDate);
    let end = new Date(endDate);

    let Differnce_In_Time = end.getTime() - start.getTime();

    let Difference_In_Days = Differnce_In_Time / (1000 * 3600 * 24);

    total_days.val(Difference_In_Days);
};
