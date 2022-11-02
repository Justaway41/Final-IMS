$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});
function addTiming() {
    $("#time-row").append(
        '                        <div class="form-row"><a href="#" class="w-100 text-right" onclick="removeTiming(this)">&#x2716</a><br>\n' +
            '                            <div class="form-group col-md-6">\n' +
            "                                <label>Start Time</label>\n" +
            '                                <input class="form-control startTime" type="time" name="start_time[]">\n' +
            "                            </div>\n" +
            '                            <div class="form-group col-md-6">\n' +
            "                                <label>End Time</label>\n" +
            '                                <input class="form-control endTime" type="time" name="end_time[]">\n' +
            "                            </div>\n" +
            "                        </div>"
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

// function timeFunction() {
//     function split(time) {
//         let t = time.split(":");
//         return parseInt(t[0] * 60, 10) + parseInt(t[1], 10);
//     }
//     let start = $("input.start-time");
//     let end = $("input.end-time");
//     let total_hours = $("input#total-hours");
//     totalHours = 0;
//     for (let i = 0; i < start.length; i++) {
//         let starttime = split($(start[i]).val());
//         let endtime = split($(end[i]).val());
//         if (starttime < endtime) {
//             totalHours_new = Math.floor(((endtime - starttime) / 60) * 2) / 2;
//         } else if (starttime > endtime) {
//             totalHours_new =
//                 Math.floor(((endtime + 24 * 60 - starttime) / 60) * 2) / 2;
//         } else {
//             totalHours_new = 0;
//         }
//         totalHours += totalHours_new;
//         total_hours.val(totalHours);
//     }
// }
