<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/admin')) {
            // homepage
            if ('/admin' === $pathinfo) {
                return array (  '_controller' => 'AdministrationBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            }

            if (0 === strpos($pathinfo, '/admin/locations')) {
                // locations
                if ('/admin/locations' === $pathinfo) {
                    return array (  '_controller' => 'AdministrationBundle\\Controller\\LocationsController::indexAction',  '_route' => 'locations',);
                }

                // location_edit
                if (0 === strpos($pathinfo, '/admin/locations/edit') && preg_match('#^/admin/locations/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_edit')), array (  '_controller' => 'AdministrationBundle\\Controller\\LocationsController::editLocation',));
                }

                // location_new
                if ('/admin/locations/new' === $pathinfo) {
                    return array (  '_controller' => 'AdministrationBundle\\Controller\\LocationsController::newLocation',  '_route' => 'location_new',);
                }

                // location_delete
                if (0 === strpos($pathinfo, '/admin/locations/deletion') && preg_match('#^/admin/locations/deletion/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_delete')), array (  '_controller' => 'AdministrationBundle\\Controller\\LocationsController::deleteLocation',));
                }

            }

            elseif (0 === strpos($pathinfo, '/admin/slides')) {
                // slides
                if ('/admin/slides' === $pathinfo) {
                    return array (  '_controller' => 'AdministrationBundle\\Controller\\SlidesController::indexAction',  '_route' => 'slides',);
                }

                // slide_preview
                if (0 === strpos($pathinfo, '/admin/slides/preview') && preg_match('#^/admin/slides/preview/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'slide_preview')), array (  '_controller' => 'AdministrationBundle\\Controller\\SlidesController::previewSlide',));
                }

                // slide_edit
                if (0 === strpos($pathinfo, '/admin/slides/edit') && preg_match('#^/admin/slides/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'slide_edit')), array (  '_controller' => 'AdministrationBundle\\Controller\\SlidesController::editSlide',));
                }

                // slide_new
                if ('/admin/slides/new' === $pathinfo) {
                    return array (  '_controller' => 'AdministrationBundle\\Controller\\SlidesController::newSlide',  '_route' => 'slide_new',);
                }

                // slide_delete
                if (0 === strpos($pathinfo, '/admin/slides/deletion') && preg_match('#^/admin/slides/deletion/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'slide_delete')), array (  '_controller' => 'AdministrationBundle\\Controller\\SlidesController::deleteSlide',));
                }

            }

            elseif (0 === strpos($pathinfo, '/admin/tag')) {
                // tag.list
                if ('/admin/tag/listOfTags' === $pathinfo) {
                    return array (  '_controller' => 'AdministrationBundle\\Controller\\TagsController::list',  '_route' => 'tag.list',);
                }

                // tag.show
                if (preg_match('#^/admin/tag/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tag.show')), array (  '_controller' => 'AdministrationBundle\\Controller\\TagsController::show',));
                }

                // tag.create
                if ('/admin/tag/create' === $pathinfo) {
                    $ret = array (  '_controller' => 'AdministrationBundle\\Controller\\TagsController::create',  '_route' => 'tag.create',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_tagcreate;
                    }

                    return $ret;
                }
                not_tagcreate:

                // tag.edit
                if (preg_match('#^/admin/tag/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'tag.edit')), array (  '_controller' => 'AdministrationBundle\\Controller\\TagsController::edit',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_tagedit;
                    }

                    return $ret;
                }
                not_tagedit:

                // tag.delete
                if (preg_match('#^/admin/tag/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'tag.delete')), array (  '_controller' => 'AdministrationBundle\\Controller\\TagsController::delete',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_tagdelete;
                    }

                    return $ret;
                }
                not_tagdelete:

            }

        }

        // display
        if ('/display' === $pathinfo) {
            return array (  '_controller' => 'DisplayBundle\\Controller\\DefaultController::indexAction',  '_route' => 'display',);
        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
