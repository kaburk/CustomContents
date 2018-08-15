# CustomContents

## Issues

- CustomField のバリデーション
- CustomArticle のテーブル生成処理
	- title のフィールドをデフォルトで追加する
- CustomArticle のテーブル更新処理
	- 更新時にモデルキャッシュを削除
- CustomArticle の管理画面
- フロントエンド表示
- プラグイン名を CustomContent に変更
- CustomContentsAppModel を Behavior 化する
- フロントエンド用のヘルパ作成
- ページネーション作成
- テンプレートをセットにして選択できるようにする
- カテゴリやタグをどうするか仕様検討
- 検索機能
- プラグイン情報ファイル
- バージョンファイル

## i18n

```
app/Console/cake i18n extract --overwrite --extract-core no --paths /var/www/html/app/Plugin/CustomContents/ --output /var/www/html/app/Plugin/CustomContents/Locale --merge no
```