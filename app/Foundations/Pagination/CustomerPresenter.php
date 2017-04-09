<?php 
namespace Hifone\Foundations\Pagination;
 
use Illuminate\Contracts\Pagination\Presenter as PresenterContract; 
use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginatorContract; 
use Illuminate\Pagination\UrlWindow; 
use Illuminate\Support\HtmlString; 
use Illuminate\Pagination\BootstrapThreeNextPreviousButtonRendererTrait; 
use Illuminate\Pagination\UrlWindowPresenterTrait;
use Illuminate\Pagination\AbstractPaginator;
 
class CustomerPresenter implements PresenterContract 
{
  use BootstrapThreeNextPreviousButtonRendererTrait, UrlWindowPresenterTrait;
 
  protected $paginator;
 
  protected $window;
 
  /**
   * Create a new Bootstrap presenter instance.
   *
   * @param \Illuminate\Contracts\Pagination\Paginator $paginator
   * @param \Illuminate\Pagination\UrlWindow|null $window
   * @return void
   */
  public function __construct(PaginatorContract $paginator, UrlWindow $window = null)
  {
    $this->paginator = $paginator;
    $this->window = is_null($window) ? UrlWindow::make($paginator) : $window->get();
  }
 
  /**
   * Determine if the underlying paginator being presented has pages to show.
   *
   * @return bool
   */
  public function hasPages()
  {
    return $this->paginator->hasPages();
  }
 
  /**
   * Convert the URL window into Bootstrap HTML.
   *
   * @return \Illuminate\Support\HtmlString
   */
  public function render()
  {
    if ($this->hasPages()) {
      return new HtmlString(sprintf(
        '<div class="paging f_r">%s %s %s</div>',
        $this->getPreviousButton('上一页'),
        $this->getLinks(),
        $this->getNextButton('下一页')
      ));
    }
 
    return '';
  }
 
  /**
   * Get HTML wrapper for an available page link.
   *
   * @param string $url
   * @param int $page
   * @param string|null $rel
   * @return string
   */
  protected function getAvailablePageWrapper($url, $page, $rel = null)
  {
    $rel = is_null($rel) ? '' : ' rel="' . $rel . '"';
 
    return '<a href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a>';
  }
 
  /**
   * Get HTML wrapper for disabled text.
   *
   * @param string $text
   * @return string
   */
  protected function getDisabledTextWrapper($text)
  {
    return '<a class="disabled hide " href="javascript:;">' . $text . '</a>';
  }
 
  /**
   * Get HTML wrapper for active text.
   *
   * @param string $text
   * @return string
   */
  protected function getActivePageWrapper($text)
  {
    return '<a class="active al" href="javascript:;" >' . $text . '</a>';
  }
 
  /**
   * Get a pagination "dot" element.
   *
   * @return string
   */
  protected function getDots()
  {
    return $this->getDisabledTextWrapper('...');
  }
 
  /**
   * Get the current page from the paginator.
   *
   * @return int
   */
  public function currentPage()
  {
    return $this->paginator->currentPage();
  }
 
  /**
   * Get the last page from the paginator.
   *
   * @return int
   */
  protected function lastPage()
  {
    return $this->paginator->lastPage();
  }
 
}