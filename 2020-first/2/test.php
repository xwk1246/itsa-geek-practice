<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input name="a" id="a">
    <span>is a friend of</span>
    <input name="b" id="b"><br>
    <button id="submit">送出</button>
    <div id="result"></div>

    <script>
        const result = document.querySelector('#result');
        const submit = document.querySelector('#submit');
        let friendList = [];
        const check = () => {
            const BIG = {
                index: null,
                value: 0,
            };
            let whereIsZero = [];
            friendList.forEach((list, index) => {
                if (list.includes(0)) whereIsZero.push(index);
                list.forEach(id => {
                    if (id > BIG.value) {
                        BIG.index = index;
                        BIG.value = id;
                    }
                });
            });

            if (whereIsZero.includes(BIG.index)) result.innerHTML = "Yes, there is a chain of friendship.";
            else result.innerHTML = "No, there are no chains of friendship.";
        };

        submit.onclick = () => {
            const a = parseInt(document.getElementById("a").value, 10);
            const b = parseInt(document.getElementById("b").value, 10);
            console.log('a: ', a, ',b: ', b)
            const aList = [];
            const bList = [];
            friendList.forEach((list, index) => {
                if (list.includes(a)) aList.push(index);
                if (list.includes(b)) bList.push(index);
            });
            console.log(aList)
            console.log(bList)

            if (aList.length === 0 && bList.length === 0) {
                console.log('no match')
                friendList.push([a, b]);
            } else if (aList.length === 0 || bList.length === 0) {
                if (aList.length === 0) {
                    bList.forEach(listId => {
                        friendList[listId].push(a);
                    });
                }
                if (bList.length === 0) {
                    aList.forEach(listId => {
                        friendList[listId].push(b);
                    });
                }
            } else {
                bList.forEach(listId => {
                    if (!aList.includes(listId)) aList.push(listId);
                });
                const combine = aList.filter(listId => listId !== Math.min(...aList));
                combine.forEach(listId => {
                    friendList[listId].forEach(id => {
                        if (!friendList[Math.min(...aList)].includes(id)) friendList[Math.min(...aList)].push(id);
                    });
                });
                friendList = friendList.filter((list, index) => index === Math.min(...aList));
            }

            console.log('friendList: ', friendList);
            check();
        };
    </script>
</body>

</html>