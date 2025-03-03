
function getLanguage() {
    const chooseLanguage = getCookie('sun-language')
    if (chooseLanguage) return chooseLanguage
    return 'zh'
  }

  function getCookie(name){
    var strcookie = document.cookie;//获取cookie字符串
    var arrcookie = strcookie.split("; ");//分割
    //遍历匹配
    for ( var i = 0; i < arrcookie.length; i++) {
    var arr = arrcookie[i].split("=");
    if (arr[0] == name){
    return arr[1];
    }
    }
    return "";
    }

    function setCookie(val){
        document.cookie=`sun-language=${val}`
    }

    const enLanguage = getLanguage() === 'en'

    $('.en-text')[enLanguage ? 'show' : 'hide']()
    $('.zh-text')[enLanguage ? 'hide' : 'show']()