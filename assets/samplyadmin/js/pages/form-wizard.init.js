$(function(){
    // form input loker
    var loker_form  = $("#loker_form");

    if($("#start_index") != undefined && $("#start_index") != '') {
        var start_index = Number($("#start_index").val());
    } else {
        var start_index = 0;
    }
    // end - form input loker

    $("#basic-example").steps({
        headerTag:"h3",
        bodyTag:"section",
        transitionEffect:"slide"
    }),
    $("#vertical-example").steps({
        headerTag:"h3",
        bodyTag:"section",
        transitionEffect:"slide",
        stepsOrientation:"vertical"
    }),
    $("#portal-wizard").steps({
        headerTag:"h3",
        bodyTag:"section",
        enableAllSteps: false,
        transitionEffectSpeed: 500,
        transitionEffect: "fade",
        startIndex: start_index,
        labels:{
            cancel:"Batal",
            current:"current step:",
            pagination:"Pagination",
            finish:"Simpan",
            next:"Simpan & Lanjut",
            previous:"Sebelum",
            loading:"Loading ..."
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if ( newIndex === 1 ) {
                $('.steps ul').addClass('step-2');
            } else {
                $('.steps ul').removeClass('step-2');
            }
            // if ( newIndex === 2 ) {
            //     $('.steps ul').addClass('step-3');
            // } else {
            //     $('.steps ul').removeClass('step-3');
            // }
            if ( newIndex === 2 ) {
                $('.steps ul').addClass('step-3');
                $('.actions ul').addClass('step-last');
            } else {
                $('.steps ul').removeClass('step-3');
                $('.actions ul').removeClass('step-last');
            }

            return true;
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if(currentIndex === 0) {
                $('#start_index').val(0);
            } else if(currentIndex === 1) {
                $('#start_index').val(1);
            } else if(currentIndex === 2) {
                $('#start_index').val(2);
            } else if(currentIndex === 3) {
                $('#start_index').val(3);
            } else if(currentIndex === 4) {
                $('#start_index').val(4);
            } else if(currentIndex === 5) {
                $('#start_index').val(5);
            } else {
                $('#start_index').val(0);
            }
        },
        onFinishing: function (event, currentIndex) {
            // submit & kunci data
            $('.btn_kunci_data').click();
        }
    }),
    $("#loker-wizard").steps({
        headerTag:"h3",
        bodyTag:"section",
        enableAllSteps: false,
        transitionEffectSpeed: 500,
        transitionEffect: "fade",
        labels:{
            cancel:"Batal",
            current:"current step:",
            pagination:"Pagination",
            finish:"Simpan",
            next:"Simpan & Lanjut",
            previous:"Sebelum",
            loading:"Loading ..."
        },
        onFinished: function (event, currentIndex) {
            loker_form.submit();
        }
    })
});