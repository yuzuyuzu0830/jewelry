document.addEventListener('DOMContentLoaded', function() {
    var allSubBoxes = document.getElementsByClassName("sub-category");
    for(var i = 0; i<allSubBoxes.length; i++) {
        allSubBoxes[i].style.display = 'none';
    }

    var pulldown = document.getElementsByClassName('pulldown');
    for(var i = 0; i<pulldown.length; i++) {
        var mainSelect = pulldown[i].getElementsByClassName("main-category");
        mainSelect[0].onchange = function() {
            var subBox = this.parentNode.getElementsByClassName("sub-category");
            for(var j = 0; j<subBox.length; j++) {
                subBox[j].style.display = 'none';
            }
            // .onchangeイベント内にあるので、thisは1階層目のvalue属性
            if(this.value) {
                // 1階層目のvalueと同じ文字列をid属性にもつ2階層めの要素を取得する
                var targetSub = document.getElementById(this.value);
                // 上記で取得した要素を表示する
                targetSub.style.display = 'inline';
            }
        }
    }

});
