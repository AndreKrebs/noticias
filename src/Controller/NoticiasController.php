<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;


/**
 * Noticias Controller
 *
 * @property \App\Model\Table\NoticiasTable $Noticias
 */
class NoticiasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $noticias = $this->paginate($this->Noticias);

        $this->set(compact('noticias'));
        $this->set('_serialize', ['noticias']);
    }

    /**
     * View method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticia = $this->Noticias->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('noticia', $noticia);
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noticia = $this->Noticias->newEntity();
        if ($this->request->is('post')) {
            $noticia = $this->Noticias->patchEntity($noticia, $this->request->data);
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('The noticia has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The noticia could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Noticias->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('noticia', 'usuarios'));
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noticia = $this->Noticias->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $filePath =  DS . 'img' . DS . 'noticias';
            
            // Upload de arquivo
            // validação simples usando @
            if(@$this->request->data['imagem']['name']) {
                
                $folder = new Folder('../webroot'); 

                // verifica se diretorio não existe 
                if (file_exists($folder->path.$filePath)===false) {
                    // cria diretorio para imagens
                    $folder->create($filePath);
                }
                
                
                // md5 do conteudo do arquivo
                $fileNameMd5 = md5_file($this->request->data['imagem']['tmp_name']);
                
                // separa extenção do arquivo
                $extFile = explode('.', $this->request->data['imagem']['name']);
                
                // concatena a extenção no nome md5
                $fileNameMd5 .= ".".$extFile[count($extFile)-1];
                
                // move o arquivo
                move_uploaded_file($this->request->data['imagem']['tmp_name'], $folder->path.$filePath . DS . $fileNameMd5);
                
                // substitui os dados do arquivo pelo novo nome que deve salvar no BD
                $this->request->data['imagem'] = $fileNameMd5;
            } else {
                unset($this->request->data['imagem']);
            }
            
            $noticia = $this->Noticias->patchEntity($noticia, $this->request->data);
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('The noticia has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The noticia could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Noticias->Usuarios->find('list', [ 'limit' => 200]);
        
        $this->set(compact('noticia', 'usuarios'));
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticia = $this->Noticias->get($id);
        if ($this->Noticias->delete($noticia)) {
            $this->Flash->success(__('The noticia has been deleted.'));
        } else {
            $this->Flash->error(__('The noticia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function getImage($id) {
        $this->render(false);
        $this->viewBuilder()->theme(null);
        echo "bla";
        if($id>0) {
            $noticia = $this->Noticias->get($id);
            
            if(count($noticia)>0 && is_array($noticia)) {
                
                print_r($noticia);
                
            }
        }
    }
    
}
