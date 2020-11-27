## 13주차 학습회고
#### 새로 배운 내용
  * JSP(Java Server Page)
    * HTML 내부에 java 코드를 입력하여 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어
    * 구성 요소
      * 템플릿 데이터: 클라이언트로 출력되는 콘텐츠
      * JSP 전용 태그: 서블릿 생성 시 특정 자바 코드로 바뀌는 태그 (지시자: <%@%>, 스크립트릿: <% %>, 선언문: <%! %>, 표현식: <%=%>)
      * JSP 내장 객체: JSP 기술 사양에 정의돈 필수적인 9개 객체 (request, response, pageContext, session, application, config, out, page, exception)

#### 문제가 발생하거나 고민한 내용 + 해결 과정
  * 이클립스에 오라클 db를 연동하는 과정에서 ping failed가 떴다. host를 server가 아닌 localhost로 바꾸어 주니까 잘 해결이 됐다.

#### 참고할 만한 내용
  * https://atoz-develop.tistory.com/entry/JSP-%EA%B8%B0%EB%B3%B8-%EB%AC%B8%EB%B2%95-%EC%B4%9D-%EC%A0%95%EB%A6%AC-%ED%85%9C%ED%94%8C%EB%A6%BF-%EB%8D%B0%EC%9D%B4%ED%84%B0-JSP-%EC%A0%84%EC%9A%A9-%ED%83%9C%EA%B7%B8-%EB%82%B4%EC%9E%A5-%EA%B0%9D%EC%B2%B4

#### 회고 (+, -, !)
  * (+): 톰캣과 이클립스를 연결해서 웹 페이지 실습을 해서 신기했다.
  * (-): 설치하는 데 시간이 많이 걸렸다. 그리고 계속 오류가 뜰까 봐 전전긍긍하며 실습을 했던 거 같다.
  * (!): JSP 를 새롭게 배웠다.

#### 동작 화면 영상
  * https://www.youtube.com/watch?v=GChJrjeiXmI&feature=youtu.be
