

require('dotenv').config();
const express = require("express")
const bodyParser = require("body-parser")

let cursos = [{id: 1, nome: "info"}];
let alunos = [{id: 1, nome: "nome1"}];
let ID = 1;

const port = process.env.PORT
const app = express()
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

app.use('/public', express.static('public'))




app.get('/alunos', (req, res) =>{
    res.json(alunos);
});

app.post('/alunos', (req,res) => {
    const {nome} = req.body
    alunos.push({id: ID++, nome})
    res.json({message: 'OK'})
})





/*app.get('/sobre', (_,res) => {
    res.json({nome: "Pedro"})
})*/

/*app.post('/cursos/alterar/:id', (req, res) => {
    const {nome} = req.body
    const {id} = req.params
    res.json({nome})
})*/

app.get('/cursos', (req,res) => {
    res.json(cursos)
})

// adiciona curso
app.post('/cursos', (req,res) => {
    const {nome} = req.body
    cursos.push({id: ID++, nome})
    res.json({message: 'OK'})
})

// altera curso
app.put('/cursos/:id', (req, res) => {
    const id = req.params.id;
    const cursoAtualizado = req.body;
    res.send(`Curso com id ${id} atualizado com sucesso!`);
  })

// remove um curso
app.delete('/cursos/:id', (req,res) => {
    const {id} = req.params
    cursos = cursos.filter(c => c.id != id)
    res.send(`Curso com id ${id} removido com sucesso!`);
})



app.listen(port, () => {
    console.log(`servidor rodando na porta ${port}`)
})