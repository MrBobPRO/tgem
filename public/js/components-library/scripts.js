document.querySelectorAll(".horizontal-tab__button").forEach(item => {  
    item.addEventListener("click", event => {
        let target = event.target;
        // get buttons parent -- Horizontal Tab
        let parent = target.closest(".horizontal-tab");
        //get tabs control content -- Horizontal Tabs Content
        let control_content = document.getElementById(parent.dataset.content);

        //hide all panes
        let panes = control_content.getElementsByClassName("horizontal-tab__pane");
        for(pane of panes) 
            pane.classList.remove("horizontal-tab__pane--active");

        //remove ative class from all tab buttons
        let buttons = parent.getElementsByClassName("horizontal-tab__button");
        for(button of buttons) 
            button.classList.remove("horizontal-tab__button--active");
        
        //set active class for clicked button 
        target.classList.add("horizontal-tab__button--active");
        // set active class for button target pane
        let target_pane = document.getElementById(target.dataset.pane);
        target_pane.classList.add("horizontal-tab__pane--active");
    })
})