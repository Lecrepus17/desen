

require('dotenv').config();
const express = require("express")
const bodyParser = require("body-parser")
const moment = require('moment');


let alunos = [{id: 1, nome: "nome1"}];

let ID = 1;
    let cursos = [
      { id: 0, nome: 'Curso de Node.js' },
    ];
const port = process.env.PORT
const app = express()


app.use('/imagens', express.static(__dirname + '/arquivos'));



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




// lista todos os cursos
app.get('/cursos', (req,res) => {
    res.json(cursos)
})
  


  // adiciona um curso
app.post('/cursos', (req,res) => {
    const {nome} = req.body
    cursos.push({id: ID++, nome})
    res.json({message: 'OK'})
})
  
  // altera um curso
  app.post('/cursos/alterar/:id', (req, res) => {
    const { nome } = req.body;
    const { id } = req.params;
    cursos = cursos.map(curso => {
      if (curso.id == id) {
        curso.nome = nome;
      }
      return curso;
    });
    const curso = cursos.find(c => c.id == id);
    res.json({nome})
    res.send(`Curso ${curso.nome} atualizado com sucesso!`);
})

  // remove um curso
  app.delete('/cursos/:id', (req,res) => {
    const {id} = req.params
    const curso = cursos.find(c => c.id == id);
    cursos = cursos.filter(c => c.id != id)

    res.send(`Curso com id ${id} removido com sucesso!`);
})



app.listen(port, () => {
    console.log(`servidor rodando na porta ${port}`)

    res.send(`Curso ${curso.nome} removido com sucesso!`);
})