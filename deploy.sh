#!/usr/bin/env sh

# 确保脚本抛出遇到的错误
set -e

commit=$(date "+Update site %Y-%m-%d %H:%M:%S")

cd .deploy_git

git add -A
git commit -m "$commit"

# 如果发布到 https://<USERNAME>.github.io/<REPO>
git push git@github.com:hunzhiwange/api.git gh-pages

cd -