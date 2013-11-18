var q = {
    el: function(selector) {
        return document.querySelector(selector);
    },
    els: function(selector) {
        return document.querySelectorAll(selector);
    }

}

function getAd() {
    var format = siteTest.format;
    var url = "controllers/get-ad-proxy.php?format=" + format;
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject('Microsoft.XMLHTTP');
    }

    request.open("GET", url, true);
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (format == 'json') {
                var obj = JSON.parse(request.responseText);
                var ad = obj.Ad;
                var url = ad['Url'];
                var title = ad['Title'];
                var descr = ad['Description'];
                var id =  ad['Id']
                var HTMLstr = "<h2><a href='index.php?c=increment&url=" + 
                url + "&id=" + id + "'>" + title + "</a></h2>" + "<p>" + 
                descr + "</p>";
                q.el('#advertisement').innerHTML = HTMLstr;
            } else {

            }
        }
    }
    request.send();
}