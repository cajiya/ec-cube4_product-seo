<?php

namespace Plugin\ProductSeo\EventListener;

// use Eccube\Common\EccubeConfig;
use Eccube\Request\Context;
use Eccube\Entity\Product;
use Eccube\Repository\ProductRepository;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ProductSeoListener implements EventSubscriberInterface
{
    /**
     * @var RequestStack
     */
    // protected $requestStack;

    /**
     * @var EccubeConfig
     */
    // protected $eccubeConfig;

    /**
     * @var Context
     */
    protected $requestContext;

    /**
     * @var ProductRepository
     */
    protected $productRepository;


    public function __construct(
      // RequestStack $requestStack,
      // EccubeConfig $eccubeConfig,
      Context $requestContext,
      ProductRepository $productRepository
      )
    {
        // $this->requestStack = $requestStack;
        // $this->eccubeConfig = $eccubeConfig;
        $this->requestContext = $requestContext;
        $this->productRepository = $productRepository;
    }

    public function onKernelRequest(FilterResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }
        if ($this->requestContext->isFront()) {
          $request = $event->getRequest();
          $pathInfo = $request->getPathInfo();
          if( strpos($pathInfo,'/products/detail/') === false ){
            return;
          }
          $response = $event->getResponse();
          $content = $response->getContent();
          $Product = $this->productRepository->find( basename( $pathInfo ) );

          $title = $Product->getPseoTitle();
          if( $title !== null ){
            $title = "<title>{$title}</title>";
            preg_match('/\<title\>(.*?)\<\/title\>/s', $content, $matches_title);
            if( $matches_title != false){
              $content = str_replace( $matches_title[0] , $title, $content);
            }else{
              $content = str_replace( "</head>" , $title."\r\n</head>" , $content);
            }
          }

          $description = $Product->getPseoDescription();
          if( $description !== null ){
            $description = "<meta name=\"description\" content=\"{$description}\" >";
            preg_match('/\<meta name=\"description\" (.*?)\>/s', $content, $matches_description);

            if( $matches_description != false){
              $content = str_replace( $matches_description[0] , $description, $content);
            }else{
              $content = str_replace( "</head>" , $description."\r\n</head>", $content);
            }
          }


          $robots = $Product->getPseoRobots();
          if( $robots !== null ){
            $robots = "<meta name=\"robots\" content=\"{$robots}\" >";
            preg_match('/\<meta name=\"robots\" (.*?)\>/', $content, $matches_robots);

            if( $matches_robots != false){
              $content = str_replace( $matches_robots[0] , $robots, $content);
            }else{
              $content = str_replace( "</head>" , $robots."\r\n</head>", $content);
            }
          }

        $response->setContent($content);

      }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.response' => ['onKernelRequest', 512],
        ];
    }

}
