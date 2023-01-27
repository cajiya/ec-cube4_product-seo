# EC-CUBE4.2用 商品ページ個別SEO設定

商品ページ毎にSEO（Title , Description）設定をするシンプルなプラグインです。

## 特徴

- 商品情報編集画面で、個別のSEOタイトル、SEOディスクリプションが設定できます
- 商品名やサイトタイトル等の自動挿入される文言を書き換えることができます

## イメージ

![管理画面編集イメージ](.github/img/admin-edit-product.png)
![フロント画面 head内](.github/img/front-view-product-head.png)

# インストール方法

```
cd app/Plugin;
git clone -b 4.2 https://github.com/cajiya/ec-cube4_pmsi.git;
mv ec-cube4_pmsi ProductMetaSeoIngenuity42;
cd ../../;
php bin/console eccube:plugin:install --code="ProductMetaSeoIngenuity42"
```

