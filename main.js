$(function(){


    $('#typo').css('color', '#8B0000');
    $('#typo').on('click', function(){
        $('#typo .inner2').animate({
                opacity: 0,
                fontSize: '8px'
            },
            1800,
        );
$(function(){$('#kaisetu').css({
'width':'620px',
'color':'#ffffff',
'font-size':'80%',
'z-index':'3',
'position':'absolute',
'top':'6px',
'left':'12px'
}).text('KIGAS音楽作品・画像ギャラリー　通信販売サイトです。下の一段目から楽曲のデモ、二段目ではギャラリー・アルバムの解説などが閲覧できます。購入フォームは左側のスライダーからどうぞ。You could please check KIgaS works below.And then browse description,if you could be interested in KIgaS,please click <Buy it> on the left slide-bar!')});

//  var target = document.getElementById('kaisetu');
//  var newTag = document.createElement("p");
//  newTag.innerHTML = '';
//  target.appendChild(newTag);
	$('#fuk').removeClass('inner2');
    });


});

$(function () {

    /*
     * Tabs
     */
    $('#work').each(function () {

        // タブの各要素を jQuery オブジェクト化
        var $tabList    = $(this).find('.tabs-nav'),   // タブのリスト
            $tabAnchors = $tabList.find('a'),          // タブ (リンク)
            $tabPanels  = $(this).find('.tabs-panel'); // パネル

        // タブがクリックされたときの処理
        // 引数としてイベントオブジェクトを受け取る
        $tabList.on('click', 'a', function (event) {

            // リンクのクリックに対するデフォルトの動作をキャンセル
            event.preventDefault();

            // クリックされたタブを jQuery オブジェクト化
            var $this = $(this);

            // もしすでに選択されたタブならなにもせず処理を中止
            if ($this.hasClass('active')) {
                return;
            }

            // すべてのタブの選択状態をいったん解除し、
            // クリックされたタブを選択状態に
            $tabAnchors.removeClass('active');
            $this.addClass('active');

            // すべてのパネルをいったん非表示にし、
            // クリックされたタブに対応するパネルを表示
            $tabPanels.hide();
            $($this.attr('href')).show();

        });

        // 最初のタブを選択状態に
        $tabAnchors.eq(0).trigger('click');

    });

});

$(function () {

    /*
     * Slideshow
     */
    // slideshow クラスを持った要素ごとに処理を実行
    $('.slideshow').each(function () {

        var $slides = $(this).find('img'), // すべてのスライド
            slideCount = $slides.length,   // スライドの点数
            currentIndex = 0;              // 現在のスライドを示すインデックス

        // 1 番目のスライドをフェードインで表示
        $slides.eq(currentIndex).fadeIn(4000);

        // 500 ミリ秒ごとに showNextSlide 関数を実行
        setInterval(showNextSlide, 6000);

        // 次のスライドを表示する関数
        function showNextSlide () {

            // 次に表示するスライドのインデックス
            // (もし最後のスライドなら最初に戻る)
            var nextIndex = (currentIndex + 1) % slideCount;

            // 現在のスライドをフェードアウト
            $slides.eq(currentIndex).fadeOut(2000);

            // 次のスライドをフェードイン
            $slides.eq(nextIndex).fadeIn(2000);

            // 現在のスライドのインデックスを更新
            currentIndex = nextIndex;
        }

    });

});



$(function(){
    // 
    var duration = 300;

    // aside ----------------------------------------
    var $aside = $('.pagem > aside');
    var $asidButton = $aside.find('button')
        .on('click', function(){
            $aside.toggleClass('open');
            if($aside.hasClass('open')){
                $aside.stop(true).animate({left: '0px'}, duration, 'easeOutBack');
                $asidButton.find('img').attr('src', 'open2.gif');
            }else{
                $aside.stop(true).animate({left: '-350px'}, duration, 'easeInBack');
                $asidButton.find('img').attr('src', 'close2.gif');
            };
        });

});
