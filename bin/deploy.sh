#!/usr/bin/env bash

git checkout main
git pull
git checkout production
git merge main
npm run build
git add .
git commit -m "chore: build assets"
git push origin production
git checkout main
