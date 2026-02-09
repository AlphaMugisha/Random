const student = [
    {id: 1, name: 'Alice', grade: 85, age: 20},
    {id: 2, name: 'Bob', grade: 92, age: 21},
    {id: 3, name: 'Charlie', grade: 78, age: 20},
    {id: 4, name: 'David', grade: 90, age: 22},
    {id: 5, name: 'Eve', grade: 88, age: 19}
];
const sorted = student.sort((a, b) => b.age - a.age);
console.log(sorted);
console.log (sorted[5 - 1].name);