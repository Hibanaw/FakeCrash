//参考 https://stackoverflow.com/questions/260857/changing-website-favicon-dynamically
const changeFavicon = link => {
    let $favicon = document.querySelector('link[rel="icon"]');
    // If a <link rel="icon"> element already exists,
    // change its href to the given link.
    if ($favicon !== null) {
        $favicon.href = link;
        // Otherwise, create a new element and append it to <head>.
    } else {
        $favicon = document.createElement("link");
        $favicon.rel = "icon";
        $favicon.href = link;
        document.head.appendChild($favicon);
    }
};



$(document).ready(function(){
    var originTitle = document.title;
    var isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1;
    var changed = false;
    document.addEventListener('visibilitychange', function(){
        if (document.hidden){
            setTimeout(function(){
                if(document.hidden){
                    changed = true;
                    changeFavicon('/sadfavicon.svg');
                    document.title = !isFirefox ? '喔唷，崩溃啦！':'糟糕，您的标签页崩溃了。';
                }
            },3000);
        }
        else{
            if(changed){
                changeFavicon('/favicon.jpg');
                document.title = '才没有寂寞呢(๑‾᷅^‾᷅๑)';
                setTimeout(function() {
                    document.title = originTitle;
                }, 3000);
            }
        }
    });
});