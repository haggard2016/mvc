<?php

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        $model = new PageModel();
        $page = $model->findByAlias('homepage');

        $args = array(
            'page' => $page
        );
        
        return $this->render('index', $args);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function contactAction(Request $request)
    {
        $form = new ContactForm($request);
        $flash = strip_tags($request->get('flash'));

        if ($request->isPost()) {
            if ($form->isValid()) {

                file_put_contents(
                    DATA_DIR . 'contact_form.txt',
                    $form->getSerializedData() . PHP_EOL,
                    FILE_APPEND
                    );

                Router::redirect('/index.php?route=index/contact&flash=Message sent');
            }

            $flash = 'Fill the fields';
        }

//        $args = array(
//            'form' => $form,
//            'flash' => $flash
//        );

        $args = compact('form', 'flash');

        return $this->render('contact', $args);
    }

}






















