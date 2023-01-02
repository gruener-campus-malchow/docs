require('dotenv').config();
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);

app.use(express.static('public'));
app.use(express.static('build'));

app.get('/', (req, res) => {
	res.sendFile(__dirname + '/public/index.html');
});

server.listen(process.env.SERVER_PORT, () => {
	console.log(`listening on *:${process.env.SERVER_PORT}`);
});

