# CampusSlides

This project enables you to write presentations with Markdown. You can see a stable version in action at https://gcm.schule/slides/.

## Getting Started

To get a local running copy, clone the repo, then run these commands:

```bash
cp .env.example .env # copy example environment config
npm ci # install dependencies
grunt build # build scss and js
node index.js # start web server
```

Then open http://localhost:9003/ in any web browser.
