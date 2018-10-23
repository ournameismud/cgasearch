<?php
/**
 * CGA Search plugin for Craft CMS 3.x
 *
 * Context and site-specific search
 *
 * @link      http://ournameismud.co.uk/
 * @copyright Copyright (c) 2018 @cole007
 */

namespace ournameismud\cgasearch\controllers;

use ournameismud\cgasearch\CgaSearch;

use Craft;
use craft\web\Controller;

/**
 * @author    @cole007
 * @package   CgaSearch
 * @since     1.0.0
 */
class SearchController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();

        $context = $request->getBodyParam('context');
        $q = $request->getBodyParam('q');
        if ($context == 'section') {
            $section = $request->getBodyParam('section');
            $redir = $section;
        } else {
            $redir = 'search';
        }
        $redir .= '?q=' . $q;

        return $this->redirect($redir);
    }

    /**
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the SearchController actionDoSomething() method';

        return $result;
    }
}
