<?php
// 手の定義
$hands = ['グー', 'チョキ', 'パー'];
$result = '';
$player_hand = '';
$pc_hand = '';

// ボタンが押されたか判定
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hand'])) {
    $player_hand = $_POST['hand'];
    $pc_hand = $hands[array_rand($hands)]; // コンピュータの手をランダム決定

    // 勝敗判定
    if ($player_hand === $pc_hand) {
        $result = 'あいこ';
    } elseif (
        ($player_hand === 'グー' && $pc_hand === 'チョキ') ||
        ($player_hand === 'チョキ' && $pc_hand === 'パー') ||
        ($player_hand === 'パー' && $pc_hand === 'グー')
    ) {
        $result = 'あなたの勝ち！';
    } else {
        $result = 'あなたの負け...';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>じゃんけんゲーム</title>
</head>
<body>
    <h1>じゃんけん勝負</h1>
    
    <form method="post">
        <button type="submit" name="hand" value="グー">✊ グー</button>
        <button type="submit" name="hand" value="チョキ">✌️ チョキ</button>
        <button type="submit" name="hand" value="パー">✋ パー</button>
    </form>

    <?php if ($result): ?>
        <hr>
        <p>あなた: <strong><?php echo htmlspecialchars($player_hand, ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <p>相手: <strong><?php echo htmlspecialchars($pc_hand, ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <h2>結果: <?php echo $result; ?></h2>
    <?php endif; ?>
    
    <br>
    <a href="index.php">ゲーム一覧に戻る</a>
</body>
</html>
