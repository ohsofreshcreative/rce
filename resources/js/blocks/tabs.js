
document.addEventListener('DOMContentLoaded', () => {
  const allTabsContainers = document.querySelectorAll('.tabs-container');

  allTabsContainers.forEach(container => {
    const tabButtons = container.querySelectorAll('.tab-button');
    const tabPanels = container.querySelectorAll('.tab-panel');
    const contentContainer = container.querySelector('.tab-content');

    const setContentHeight = (activeIndex) => {
      if (contentContainer && tabPanels[activeIndex]) {
        contentContainer.style.height = `${tabPanels[activeIndex].offsetHeight}px`;
      }
    };

    setTimeout(() => {
        setContentHeight(0);
    }, 200);

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const tabIndex = button.dataset.tab;

        tabButtons.forEach(btn => btn.classList.remove('is-active'));
        button.classList.add('is-active');

        tabPanels.forEach(panel => {
          panel.classList.remove('is-visible');
          panel.classList.add('opacity-0', 'pointer-events-none');
        });

        const activePanel = container.querySelector(`.tab-panel[data-panel='${tabIndex}']`);
        if (activePanel) {
          activePanel.classList.add('is-visible');
          activePanel.classList.remove('opacity-0', 'pointer-events-none');
        }
        
        setContentHeight(tabIndex);
      });
    });

    window.addEventListener('resize', () => {
        const activeIndex = container.querySelector('.tab-button.is-active')?.dataset.tab || 0;
        setContentHeight(activeIndex);
    });
  });
});