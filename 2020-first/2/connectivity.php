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
    <div id="result">
    </div>

    <script>
        const result = document.querySelector('#result');
        const submit = document.querySelector('#submit');
        let friendList = [];
        const check = () => {

        };

        // submit.onclick = () => {
        //     const aList = [];
        //     const bList = [];
        //     friendList.forEach((list, index) => {
        //         if (list.includes(a)) aList.push(index);
        //         if (list.includes(b)) bList.push(index);
        //     });
        //     console.log(aList)
        //     console.log(bList)
        //     if (aList.length === 0 && bList.length === 0) {
        //         console.log('no match')
        //         friendList.push([a, b]);
        //     } else if (aList.length === 0 || bList.length === 0) {
        //         if (aList.length === 0) {
        //             bList.forEach(listId => {
        //                 friendList[listId].push(a);
        //             });
        //         }
        //         if (bList.length === 0) {
        //             aList.forEach(listId => {
        //                 friendList[listId].push(b);
        //             });
        //         }
        //     } else {
        //         bList.forEach(listId => {
        //             if (!aList.includes(listId)) aList.push(listId);
        //         });
        //         const combine = aList.filter(listId => listId !== Math.min(...aList));
        //         combine.forEach(listId => {
        //             friendList[listId].forEach(id => {
        //                 if (!friendList[Math.min(...aList)].includes(id)) friendList[Math.min(...aList)].push(id);
        //             });
        //         });
        //         friendList = friendList.filter((list, index) => !combine.includes(index));
        //     }
        //     console.log('friendList: ', friendList);
        //     check();
        // };

        class node {
            constructor(val, a, b) {
                this.val = val;
                this.left = a;
                this.right = b;
            }
        }
        const treeFind = (root, target) => {
            if (!root) return;
            if (root.val === target) return root;
            if (target < root.val)
                return treeFind(root.left, target);
            if (target > root.val)
                return treeFind(root.right, target);
        }
        const treeInsert = (root, target) => {
            if (!root) {
                return new node(target, null, null);
            }
            if (target < root.val)
                root.left = treeInsert(root.left, target);
            if (target > root.val)
                root.right = treeInsert(root.right, target);
        }
        const pushNew = (treeList, a, b) => {
            if (a > b) {
                treeList.push(
                    new node(a, new node(b, null, null), null)
                );
            } else {
                treeList.push(
                    new node(a, null, new node(b, null, null))
                )
            }
        }
        const treeList = [];
        submit.onclick = () => {
            const a = parseInt(document.getElementById("a").value, 10);
            const b = parseInt(document.getElementById("b").value, 10);
            if (treeList.length === 0) {
                pushNew(treeList, a, b);
                console.log(treeList);
                return;
            }
            let findA, findB;
            let rootA, rootB
            treeList.forEach(root => {
                if (treeFind(root, a)) {
                    findA = treeFind(root, a)
                    rootA = root;
                }
            })
            treeList.forEach(root => {
                if (treeFind(root, b)) {
                    findB = treeFind(root, b)
                    rootB = root;
                }
            })
            if (findA && findB) {
                treeInsert(findA, rootB);
            } else if (findA) {
                treeInsert(findA, b);
            } else if (findB) {
                treeInsert(findB, a);
            } else {
                pushNew(treeList, a, b);
            }

            console.log(treeList);
        }
    </script>
</body>

</html>