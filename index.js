require('dotenv').config();
const express = require("express")
const bodyParser = require("body-parser")

let cursos = []
let ID = 1

const port = process.env.PORT
const app = express()
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

app.use('/public', express.static('public'))

app.get('/sobre', (_,res) => {
    res.json({nome: "Pedro"})
})
app.post('/cursos/alterar/:id', (req, res) => {
    const {nome} = req.body
    const {id} = req.params
    res.json({nome})
})

app.get('/cursos', (req,res) => {
    res.json(cursos)
})

app.post('/cursos', (req,res) => {
    const {nome} = req.body
    cursos.push({id: ID++, nome})
    res.json({message: 'OK'})
})

app.listen(port, () => {
    console.log(`servidor rodando na porta ${port}`)
})

app.delete('/cursos/:id', (req,res) => {
    const {id} = req.params
    cursos = cursos.filter(c => c.id != id)
    res.json({message: "eeee"})
})