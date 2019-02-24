<script src="https://static.landbot.io/landbot-widget/landbot-widget-1.0.0.js"></script>
<script>
    var myLandbotLivechat = new LandbotLivechat({
        index: 'https://landbot.io/u/H-140165-01UH2KAUYLG0C48P/index.html',
    });
</script>
<script>
    // Show a proactive message after 8 seconds
    setTimeout(() => {
        myLandbotLivechat.sendProactive("Hello there!");
    }, 8000);
</script>