const clickedBtns = document.querySelectorAll(".liked-Btn");
for (let index = 0; index < clickedBtns.length; index++){
    clickedBtns[index].addEventListener("click", async (e)=>{
        const clickedEl = e.target;
        console.log(clickedEl.classList);
        clickedEl.classList.toggle("liked");
        
        const postId = clickedEl.id;
        try {
            const res = await fetch("/post/like", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ post_id: postId }),
            });

            const data = await res.json();
            clickedEl.nextElementSibling.innerHTML = data.likescount;

        } catch (error) {
            alert("処理が失敗しました");
        }
    });
}