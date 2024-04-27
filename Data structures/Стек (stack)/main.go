// Хороший пример использования стека в задаче https://leetcode.com/problems/make-the-string-great/
// Если кратко, то нужно удалить все подряд идущие пары одной и тойже буквы, но в разных регистрах. Например Aa и Aa
// Стоит учитывать что одного прохода недостаточно , потому что может быть слово abBA и тогда после удаления bB нужно будет удалить Aa

// В этой задаче иделаьно подходит структура стек. В стек мы складываем буквы, которые не образуют такой пары с предыдущей буквой.
// Положив первую букву слова, в цикле мы берем вторую букву и сравниваем ее с верхушкой стека. Если пара не обазована, кладем эту букву в стек и идем дальше
// Если пара есть, то удаляем верхнюю букву из стека и не добавляем в стек текущую

package main

import "fmt"

func main() {
	fmt.Println(makeGood("leEeetcode"))
}

func makeGood(s string) string {
	stack := make([]byte, 0)

	if len(s) == 0 {
		return string(stack)
	}

	stack = append(stack, s[0])

	for i := 1; i < len(s); i++ {
		if len(stack) > 0 && (stack[len(stack)-1]-32 == s[i] || stack[len(stack)-1]+32 == s[i]) {
			stack = stack[:len(stack)-1]
			continue
		}
		stack = append(stack, s[i])
	}
	return string(stack)
}
