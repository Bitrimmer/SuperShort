$(document).ready(function() {

    function checkLink(link){
        const regex = /^(http|https):\/\//gm;
        let result = regex.test(link)
        return result
    }

    function check_robots(){
        var sBrowser, sUsrAg = navigator.userAgent;
        if (sUsrAg.indexOf("Firefox") > -1) {
            sBrowser = "Firefox";
        } else if (sUsrAg.indexOf("Opera") > -1) {
            sBrowser = "Opera";
        } else if (sUsrAg.indexOf("Trident") > -1) {
            sBrowser = "Trident";
        } else if (sUsrAg.indexOf("Edge") > -1) {
            sBrowser = "Edge";
        } else if (sUsrAg.indexOf("Chrome") > -1) {
            sBrowser = "Chrome";
        } else if (sUsrAg.indexOf("Safari") > -1) {
            sBrowser = "Safari";
        } else {
            sBrowser = "unknown";
        }

        $.ajax({
            url: 'http://qnits.net/api/checkUserAgent',
            method: 'get',
            data: {
                userAgent: sBrowser
            },
            success: function(data){
              return data.isBot;
            }
        });
    }
    function addLink(link){
        $.ajax({
            url: '/site/link',
            method: 'get',
            data:  {
                link: link
            },
            success: function(data){
                let url = window.location.origin+'?link='+data
                $('#shortLink').html("<a id='uiidLink' href='"+url+"'>"+url+"</a>")
            }
        });
    }


    $('.btn-primary').click(function(e){
        e.preventDefault();
       var link =  checkLink($('#link').val())
       var robots = check_robots()
        if(link === true){
            addLink($('#link').val())
        }else{
            Swal.fire(
                'Вы уверены что это ссылка?',
            )
        }

    })

});


